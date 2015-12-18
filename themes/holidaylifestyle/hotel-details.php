<?php
/*
Template Name: Hotel-Details
*/
?>
<?php
// include custom Header cause of styling.
include('detailsHeader.php');
$departureAirports = ReadCfgFiles::readCfgFile('../wordpress/wp-content/themes/holidaylifestyle/LMwebSoapClient/cfgFiles/departureAirport.cfg');

if (!isset($_GET['departureAirport'])) {

    $gid = $_GET['gid'];
    $postId = $_GET['postId'];
    $departureAirport = 'FRA';
    $destination = $_GET['aptd'];
    // default value for departure Date.
    $datetime = new DateTime('tomorrow');
    $departureDate = $datetime->format('Ymd');
    // default value for return Date.
    $date = strtotime("+8 day");
    $returnDate = date('Ymd', $date);

    $newdepartureDate = $datetime->format('d/m/Y');
    $newreturnDate = date('d/m/Y', $date);

    // Default values for Dev.
    //$zt = '0';
    $vt = '';

    $jType = '2';
    $lmin = '7';
    $lmax ='10';
    $dateType = null;

} elseif (isset($_GET['departureAirport'])) {

    $departureAirport = $_GET['departureAirport'];
    $destination = $_GET['destination'];
    $departureDate = $_GET['departureDate'];
    $returnDate = $_GET['returnDate'];
    $postId = $_GET['postId'];
    $gid = $_GET['gid'];
    // format new DateTime Object.
    $dateTime = DateTime::createFromFormat('ymd', $departureDate);
    $newdepartureDate = $dateTime->format('d/m/Y');
    $dateTime1 = DateTime::createFromFormat('ymd', $returnDate);
    $newreturnDate = $dateTime1->format('d/m/Y');
    $setka1='0';
    $setka2='0';
    $setka3='0';
    $setka4='0';
    $setvt='0';
    if(isset($_GET['ka1']) && $_GET['ka1']!="")
    {
        $ka1=$_GET['ka1'];
        $setka1='1';
    }
    if(isset($_GET['ka2']) && $_GET['ka2']!="")
    {
        $ka2=$_GET['ka2'];
        $setka2='1';
    }
    if(isset($_GET['ka3'])&& $_GET['ka3']!="")
    {
        $ka3=$_GET['ka3'];
        $setka4='1';
    }
    if(isset($_GET['ka4'])&& $_GET['ka4']!="")
    {
        $ka4=$_GET['ka4'];
        $setka1='1';
    }
    if(isset($_GET['vt']))
    {
        $vt=$_GET['vt'];
        $setvt=1;
    }

    // Default values for Dev.
   // $zt = '0';
    //$vt = 'GT06-AI,GT06-AO,GT06-BB,GT06-HB,GT06-FB';
    $numKids=$_GET['numKids'];
    $jType = $_GET['journeyType'];
    $lmin = $_GET['lmin'];
    $lmax = $_GET['lmax'];
    $dateType = $_GET['dateType'];
    $numPersons= $_GET['numPersons'];
}

// get the Hotel Images for the specific post.
$hotelImages = get_post_meta($postId, 'hotelImage', true);
$hotelTitle = get_post_meta($postId, '_title', true);
require '../wordpress/wp-content/themes/holidaylifestyle/details_init.php';
?>
<script>
    $(document).ready(function () {

        var params = window.location.href.split('?')[1];
        $('.backToSearch').attr('href', 'http://localhost/wordpress?' + params + '&back=1');
        var chkInitialLoad = 1;
        var firstdate,seconddate;
        var lmin='<?php echo $lmin; ?>';
        var lmax='<?php echo $lmax; ?>';
        var journeyType = '<?php echo $jType; ?>';
        var vType, numPerson = '<?php echo $numPersons; ?>';
        //###########To load option of selected before from Hotel+Flight or Only Hotel##############################
        var $radios = $('input:radio[name=flight-option]');
        $radios.filter('[value=<?php echo $jType; ?>]').prop('checked', 'checked');

        //set Departure Airport
        $('#abflugVon').val('<?php echo $departureAirport; ?>');
        //set num of persosn and children
        $('#persons').val('<?php echo $numPersons; ?>');
        $('#chooseKids').val('<?php echo $numKids; ?>');
        //set the date picker value for the Kinder
        var setka1='<?php echo $setka1;?>';
        var setka2='<?php echo $setka2;?>';
        var setka3='<?php echo $setka3;?>';
        var setka4='<?php echo $setka4;?>';
        if(setka1=='1')
        {
            $('#date-picker11').val('<?php echo $ka1;?>');
            $('.onekid').show();

        }
        if(setka2=='1')
        {
            $('#date-picker12').val('<?php echo $ka2;?>');
            $('.onekid').show();
            $('.twokid').show();
        }
        if(setka3=='1')
        {
            $('#date-picker13').val('<?php echo $ka3;?>');
            $('.onekid').show();
            $('.twokid').show();
            $('.threekid').show();
        }
        if(setka4=='1')
        {
            $('#date-picker14').val('<?php echo $ka4;?>');
            $('.onekid').show();
            $('.twokid').show();
            $('.threekid').show();
            $('.fourkid').show();
        }

        //To load the value in date picker from priori selected date.

        var chkdateformat='<?php echo $dateType;?>';
        if(chkdateformat=='e') {

            $('.datum-tabs a[href="#exakte-left"]').tab('show');
            $('#date-picker6').val('<?php echo $newdepartureDate; ?>');
            $('#date-picker7').val('<?php echo $newreturnDate; ?>');
            $('#datum-id-left').val($('#date-picker6').val()+' | '+ $('#date-picker7').val());
        }
        else if (chkdateformat == 'f') {
            $('.datum-tabs a[href="#flexible-left"]').tab('show');
            $('#date-picker8').val('<?php echo $newdepartureDate; ?>');
            $('#date-picker9').val('<?php echo $newreturnDate; ?>');
            var reisedauer;
            //set the reisedauer
            if(lmin!=lmax)
            {
                reisedauer=lmin+'-'+lmax;
            }
            else
            {
                reisedauer=lmin;
            }
            $('#reisedauer2').val(reisedauer);
            if ($('#reisedauer2').val() == 1) {
                var value = $('#date-picker8').val() + ' | ' + $('#date-picker9').val() + " | " + $('#reisedauer2').val() + " Nacht";
            }
            else {
                var value = $('#date-picker8').val() + ' | ' + $('#date-picker9').val() + " | " + $('#reisedauer2').val() + " Nächte";
            }
            $('#datum-id-left').val(value);
        }

        var abflugzeit = 0;
        var ruckflugzeit = 0;

        $('#abflugzeit').change(function () {

            abflugzeit = $('#abflugzeit').val();

        });
        $('#ruckflugzeit').change(function () {

            ruckflugzeit = $('#ruckflugzeit').val();
            //console.log('RuckflugZeit'+ruckflugzeit);
        });

        var departureDate = '<?php echo $departureDate?>';
        var returnDate = '<?php echo $returnDate?>';
        // Fetch the Code of the zimmer while applying filter.

        var zt;//='0';

        var zt_Obj = {
            "beliebig": '0',
            "Doppelzimmer": '1',
            "Einzelzimmer": '2',
            "Appartement": '3',
            "Studio": '4',
            "Bungalow": '5',
            "Suite": '6'
        };
        $('#zimmer').change(function () {
            var zimmerVal = $('#zimmer').val();
            for (key in zt_Obj) {
                if (zt_Obj.hasOwnProperty(key)) {
                    if (zimmerVal == key) {
                        zt = zt_Obj[key];
                    }
                }
            }
        });
        // Fetch the Code of the Verflegung while applying filter.
        var vt ;//= 'GT06-AI,GT06-FB,GT06-HB,GT06-BB,GT06-AO';
        var setvt='<?php echo $setvt?>';
        if(setvt=='1')
        {
            vt='<?php echo $vt?>';
        }

        var vt_Obj = {
            "All Inklusive": 'GT06-AI',
            "Vollpension": 'GT06-FB',
            "Halbpension": 'GT06-HB',
            "Frühstück": 'GT06-BB',
            "ohne Verpflegung": 'GT06-AO'
        };

        $('#verflegung').change(function () {
            var vtVal = $('#verflegung').val();
            for (key in vt_Obj) {
                if (vt_Obj.hasOwnProperty(key)) {
                    if (vtVal == key) {
                        vt = vt_Obj[key];
                        //console.log("VTYPE" + vt);
                    }
                }
            }
        });
        //If the Exact date is Selected
        $('#getDetailsDate').on('click', function () {
            chkdateformat='e';
            var test_ = $('#date-picker6').val();
            var newdate_ = test_.split("/").reverse();
            var year_ = newdate_[0].split("20");
            var yearn_ = year_[1];
            var month_ = newdate_[1];
            var day_ = newdate_[2];
            departureDate = year_.concat(month_, day_).join("");
            firstdate=new Date(newdate_[0],month_,day_);

            // Change the Format of the  departureDate(YYMMDD format).
            var test1_ = $('#date-picker7').val();
            var newdate1_ = test1_.split("/").reverse();
            var year1_ = newdate1_[0].split("20");
            var yearn1_ = year1_[1];
            var month1_ = newdate1_[1];
            var day1_ = newdate1_[2];
            returnDate = year1_.concat(month1_, day1_).join("");
            seconddate=new Date(newdate1_[0],month1_,day1_);
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var diffDays = Math.round(Math.abs((firstdate.getTime() - seconddate.getTime())/(oneDay)));
            lmin=diffDays-1;
            lmax=diffDays-1;
        });
        //if Flexible dates are selected
        $('#flexButton').click(function() {
            chkdateformat='f';

            if ($('#date-picker8').val() == null) {
                departureDate = '1';
            }
            else {
                var test = $('#date-picker8').val();
                var newdate = test.split("/").reverse();
                var year = newdate[0].split("20");
                var yearn = year[1];
                var month = newdate[1];
                var day = newdate[2];
                departureDate = year.concat(month, day).join("");
                firstdate=new Date(newdate[0],month,day);

            }
            // convert Returndate to YYMMDD format for the Ajax Request.

            if ($('#date-picker9').val() == null) {
                returnDate = '21';
            }
            else {
                var test1 = $('#date-picker9').val();

                var newdate1 = test1.split("/").reverse();
                var year1 = newdate1[0].split("20");
                var yearn1 = year1[1];
                var month1 = newdate1[1];
                var day1 = newdate1[2];
                returnDate = year1.concat(month1, day1).join("");
                seconddate=new Date(newdate1[0],month1,day1);

            }

            var nights = $('#reisedauer2').val();
            if (nights.indexOf('-') !== -1) {
                // reisedauer is something like 1-3
                var nightsSplit = nights.split('-');
                lmin = nightsSplit[0];
                lmax = nightsSplit[1];
            }
            else {
                // reisedauer is something like 9. lmin and lmax is reisedauer
                lmin = nights;
                lmax = nights;
            }

        });

        //set the Reisetellnehmer Field
        var csetdate1 = '', csetdate2 = '', csetdate3 = '', csetdate4 = '', numKids = '0';
       $('#getNumOfPersons').click(function () {
           numPerson = $('#persons').val();
           numKids = $('#chooseKids').val();
           if (numKids == '0') {
               var str_kind = ' Kinder';
           }
           else if (numKids > '1') {
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

        $('#chooseKids').change(function () {
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
        });

        // Calling data_booking Function fromdata.json to initllz load the data from API.
        AjaxCall();

        // When There is some Filter Applied then Again call the data_booking Fucntion to refresh the data from API.
        $('form').submit(function (event) {
            AjaxCall();
        });
        function AjaxCall() {
            // For the Loader Image.

            numPerson = $('#persons').val();
            numKids = $('#chooseKids').val();
            if (numKids == '0') {
                var str_kind = ' Kinder';
            }
            else if (numKids > '1') {
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

            if (numKids == '1') {
                var pickerVal1 = $('#date-picker11').val();
                var cdate1 = pickerVal1.split("/").reverse();
                var cyear1 = cdate1[0];
                var cmonth1 = cdate1[1];
                var cday1 = cdate1[2];
                csetdate1 = calculateAge(cmonth1, cday1, cyear1);

            }
            if (numKids == '2') {
                var pickerVal1 = $('#date-picker11').val();
                var cdate1 = pickerVal1.split("/").reverse();
                var cyear1 = cdate1[0];
                var cmonth1 = cdate1[1];
                var cday1 = cdate1[2];
                csetdate1 = calculateAge(cmonth1, cday1, cyear1);
                //console.log(csetdate1);
                var pickerVal2 = $('#date-picker12').val();
                var cdate2 = pickerVal2.split("/").reverse();
                var cyear2 = cdate2[0];
                var cmonth2 = cdate2[1];
                var cday2 = cdate2[2];
                csetdate2 = calculateAge(cmonth2, cday2, cyear2);
                //console.log(csetdate2);
            }
            if (numKids == '3') {
                var pickerVal1 = $('#date-picker11').val();
                var cdate1 = pickerVal1.split("/").reverse();
                var cyear1 = cdate1[0];
                var cmonth1 = cdate1[1];
                var cday1 = cdate1[2];
                csetdate1 = calculateAge(cmonth1, cday1, cyear1);
                //console.log(csetdate1);
                var pickerVal2 = $('#date-picker12').val();
                var cdate2 = pickerVal2.split("/").reverse();
                var cyear2 = cdate2[0];
                var cmonth2 = cdate2[1];
                var cday2 = cdate2[2];
                csetdate2 = calculateAge(cmonth2, cday2, cyear2);
                //console.log(csetdate2);
                var pickerVal3 = $('#date-picker13').val();
                var cdate3 = pickerVal3.split("/").reverse();
                var cyear3 = cdate3[0];
                var cmonth3 = cdate3[1];
                var cday3 = cdate3[2];
                csetdate3 = calculateAge(cmonth3, cday3, cyear3);
                //console.log(csetdate3);
            }
            if (numKids == '4') {
                var pickerVal1 = $('#date-picker11').val();
                var cdate1 = pickerVal1.split("/").reverse();
                var cyear1 = cdate1[0];
                var cmonth1 = cdate1[1];
                var cday1 = cdate1[2];
                csetdate1 = calculateAge(cmonth1, cday1, cyear1);
                //console.log(csetdate1);
                var pickerVal2 = $('#date-picker12').val();
                var cdate2 = pickerVal2.split("/").reverse();
                var cyear2 = cdate2[0];
                var cmonth2 = cdate2[1];
                var cday2 = cdate2[2];
                csetdate2 = calculateAge(cmonth2, cday2, cyear2);
                //console.log(csetdate2);
                var pickerVal3 = $('#date-picker13').val();
                var cdate3 = pickerVal3.split("/").reverse();
                var cyear3 = cdate3[0];
                var cmonth3 = cdate3[1];
                var cday3 = cdate3[2];
                csetdate3 = calculateAge(cmonth3, cday3, cyear3);
                //console.log(csetdate3);
                var pickerVal4 = $('#date-picker14').val();
                var cdate4 = pickerVal4.split("/").reverse();
                var cyear4 = cdate4[0];
                var cmonth4 = cdate4[1];
                var cday4 = cdate4[2];
                csetdate4 = calculateAge(cmonth4, cday4, cyear4);
            }
            var send_data_booking = {};
            send_data_booking = {
                'journeyType': $('input[name=flight-option]:checked').val(), //$('input[name=journeyType]:checked').val(),//$('input[name=journeyType]:radio:checked').val(),
                'departureDate': departureDate,
                'returnDate': returnDate,
                'destination': '<?php echo $destination; ?>',
                'departureAirport': $('#abflugVon').val(),
                'gid': '<?php echo $gid; ?>',
                'persons': numPerson,
                'lmin':lmin,
                'lmax':lmax,
                'chkFunction': 'dataBooking'
            };
            if(vt!='')
            {
                send_data_booking['vt'] = vt;
            }
            if(zt!='')
            {
                send_data_booking['zt'] = zt;
            }
            if (numKids == '1') {
                send_data_booking['ka1'] = csetdate1;
            }
            if (numKids == '2') {
                send_data_booking['ka1'] = csetdate1;
                send_data_booking['ka2'] = csetdate2;
            }
            if (numKids == '3') {
                send_data_booking['ka1'] = csetdate1;
                send_data_booking['ka2'] = csetdate2;
                send_data_booking['ka3'] = csetdate3;
            }
            if (numKids == '4') {
                send_data_booking['ka1'] = csetdate1;
                send_data_booking['ka2'] = csetdate2;
                send_data_booking['ka3'] = csetdate3;
                send_data_booking['ka4'] = csetdate4;
            }

            $(".loader").css("display", "block");
            // Call the Ajax.

            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: '<?php echo bloginfo('template_url') .'/data_json.php' ?>', // the url where we want to POST
                data: send_data_booking, // our data object
                dataType: 'json', // what type of data do we expect back from the server
                encode: true
            })
                // using the done promise callback
                .done(function (data) {
                    $(".loader").css("display", "none");
                    if (!data.hotel) {
                        return $("#table_data").html('<div id="noEntryFoundMsg">Es konnten leider keine passenden Angebote gefunden werden</div>');
                    }
                    // Make table data empty when ever it been refreshed.

                    $("#table_data").empty();
                    $("#table_data").html("");

                    var abflugzeit1 = '00:00', abflugzeit2 = '24:00';
                    if (abflugzeit != 0) {
                        abflugzeit1 = abflugzeit.split('-')[0];
                        abflugzeit2 = abflugzeit.split('-')[1];
                    }

                    var ruckflugzeit1 = '00:00', ruckflugzeit2 = '24:00';
                    if (ruckflugzeit != 0) {
                        ruckflugzeit1 = ruckflugzeit.split('-')[0];
                        ruckflugzeit2 = ruckflugzeit.split('-')[1];
                    }

                    // Only first time load data inside the ZT and VT.

                    if (chkInitialLoad == 1) {

                        // Fetching possible value of ZT and VT from API for the first time.

                        var datesFilter = data.datesList;
                        var verflegungList = [];
                        var zimmerList = [];
                        var verflegung = $('#verflegung');
                        $.each(datesFilter, function (i, item) {
                            //add all destination region  with unique name
                            if ($.inArray(datesFilter[i].vt, verflegungList) == -1)
                                verflegung.append(
                                    $('<option></option>').val(datesFilter[i].vt).html(datesFilter[i].vt)
                                );
                            verflegungList.push(datesFilter[i].vt);

                        });

                        var mySelect = $('#zimmer');
                        $.each(datesFilter, function (i, item) {
                            //add all destination region  with unique name
                            if ($.inArray(datesFilter[i].zt, zimmerList) == -1)
                                mySelect.append(
                                    $('<option></option>').val(datesFilter[i].zt).html(datesFilter[i].zt)
                                );
                            zimmerList.push(datesFilter[i].zt);

                        });
                        chkInitialLoad = 0; // make it zero so that it will not come inside this when Filtering been applied.
                    }

                    var path = "../wordpress/wp-content/themes/holidaylifestyle";

                    // Binding of Dynamic Table Starts Here.

                    var html = '<h1>' + data.hotel + '</h1>' +
                        '<table border="1" cellpadding="5" cellspacing="0" width="100%" rules="all">' +
                        '<tr bgcolor="#E6E6E6">' +
                        '<div class="table-heading-bg">' +
                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-heading">Datum von / bis</div>';

                    // Filter Table Column according to type of the Journey.

                    if ($('input[name=flight-option]:checked').val() == '2') {
                        html += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-heading">Abflughafen Nächte</div>';
                    } else {
                        html += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-heading">Dauer</div>';
                    }

                    html += '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-heading">Zimmertyp Verpflegung</div>' +

                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-heading">Flugzeit Alternative Flüge</div>' +
                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-heading">Gesamtpreis 2 Erwachsene</div>' +
                        '</div>' +
                        '<div class="clearfix"></div>';

                    var dates = data.datesList;

                    //  If Checkbox checked for direct flight.

                    if ($('#nurDirektflugeCheckBox').prop('checked') == true && $('input[name=flight-option]:checked').val() == 2) {
                        $.each(dates, function (i, item) {
                            if (item.depStpOvr == '0' && item.retStpOvr == '0') {
                                //console.log('Direct flights Called');
                                var flightTime = item.depFlight;
                                flightTime = flightTime.split('-')[0];
                                var retFlightTime = item.retFlight;
                                retFlightTime = retFlightTime.split('-')[0];
                                //Condition for selected flight time
                                if ((flightTime > abflugzeit1 && flightTime < abflugzeit2) && (retFlightTime > ruckflugzeit1 && retFlightTime < ruckflugzeit2)) {


                                        var item = item;
                                        var source = item.source;
                                        var functionCall = '';
                                        html += '<div class="flugafen-row">' +
                                            '<div class="table-row">' +
                                            '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" >' + item.date.day + '.' + item.date.month + '.' + item.date.year + '<br>' + item.bday.day + '.' + item.bday.month + '.' + item.bday.year + '</div>';
                                        if ($('input[name=flight-option]:checked').val() == 2) {
                                            html += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" >von ' + item.departure + '<br> ' + item.days + '  days</div>';
                                        } else {
                                            html += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" > ' + item.days + '  days</div>';
                                        }
                                        html += '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content" >' + item.zt + '/' + item.roomName + '/' + item.vt + '</div>' +
                                            '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content einklappen">' + item.tourOperator + '</div>' +
                                            '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" ><a href="#chkOffers" id="chkAvailability' + i + '"><div class="gesamptpreis" >€ ' + item.gPrice + '</div></a></div>' +
                                            '<div class="clearfix"></div>' +
                                                /*'<div class="close-sub-div"><img src="<?php bloginfo('template_url') ?>/images/close-34.png" alt="" title=""></div>'+*/
                                            '<div class="clearfix"></div>' +
                                            '<div class="sub-div-white" style="display: none;">' +
                                            '<div class="close-sub-div"><img src="<?php bloginfo('template_url') ?>/images/close-34.png" alt="" title=""></div>' +
                                            '<div class="clearfix"></div>' +
                                            '<div class="alternativeFlight_tables"></div>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="clearfix"></div>' +
                                            '<div id="chkOffers' + i + '"></div>' +
                                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing drop_button_flugafen_down" id="alternative' + i + '" style="display: block; "><img src="<?php bloginfo('template_url') ?>/images/arrow-down-30.png" class="img-responsive text-center arrow-down" alt="" title=""></div>' +
                                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing drop_button_flugafen_up" style="display: none;"><img src="<?php bloginfo('template_url') ?>/images/arrow-up-30.png" class="img-responsive text-center arrow-up" alt="" title=""></div>' +
                                            '</div>';

                                        // Check For Alternative flights.
                                        $(document).off('click', '#alternative' + i + '').on('click', '#alternative' + i + '', function () {
                                           /* $(".alternativeFlight_tables").html("");*/

                                            var chk = 'flight';
                                            var currentdeparturedate = item.date.day + "." + item.date.month + "." + item.date.year;
                                            var currentreturnDate = item.bday.day + "." + item.bday.month + "." + item.bday.year;
                                            var currentdepFlight = item.depFlight;
                                            var currentretFlight = item.retFlight;
                                            helper(i, chk, item.source, item.ref, item.aptd, item.aptdest, item.tourOperator, item.lc, item.uc, item.price, item.ovr, item.travelType, currentdeparturedate, currentreturnDate, currentdepFlight, currentretFlight, item.gPrice);

                                        });

                                        // Check for Availablity of the Offer.
                                        $(document).off('click', '#chkAvailability' + i + '').on('click', '#chkAvailability' + i + '', function () {

                                            offerCheck(i, item.ref);
                                        });
                                    }

                                }

                        });


                    }
                    // It will come here if there is no Direct Flight Selected or Data Requested for the Hotel.
                    else {
                        //console.log('All flights Called or Hotel Page Called');
                        $.each(dates, function (i, item) {
                            var source = item.source;
                            var functionCall = '';
                            var flightTime = '01:00';
                            var retFlightTime = '01:00';

                            //Dynamic loading of data
                            if (item.hasOwnProperty('depFlight')) {
                                //console.log('there is a property');
                                flightTime = item.depFlight;
                                flightTime = flightTime.split('-')[0];
                                retFlightTime = item.retFlight;
                                retFlightTime = retFlightTime.split('-')[0];
                            }
                            else {
                                //console.log('No flight Information Available');
                                abflugzeit1 = '00:00';
                                abflugzeit2 = '24:00';
                                ruckflugzeit1 = '00:00';
                                ruckflugzeit2 = '24:00';
                            }
                            //console.log('Flighttime'+flightTime);
                            //console.log('ab1 '+abflugzeit1.toString());
                            //console.log('ab2 '+abflugzeit2);
                            //console.log('retFlightTime '+flightTime);
                            //console.log('ruck1 '+ruckflugzeit1);
                            //console.log('ruck2 '+ruckflugzeit2);


                            if ((flightTime >abflugzeit1 && flightTime< abflugzeit2) && (retFlightTime>ruckflugzeit1 && retFlightTime<ruckflugzeit2)){

                            //console.log('Going inside Loop');
                            // Dynamic Loading of all the alternative Flights.
                            html += '<div class="flugafen-row">' +
                                '<div class="table-row">' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" >' + item.date.day + '.' + item.date.month + '.' + item.date.year + '<br>' + item.bday.day + '.' + item.bday.month + '.' + item.bday.year + '</div>';

                            if ($('input[name=flight-option]:checked').val() == 2) {
                                html += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" >von ' + item.departure + '<br> ' + item.days + '  days</div>';
                            } else {
                                html += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" > ' + item.days + '  days</div>';
                            }

                            html += '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content" >' + item.zt + '/' + item.roomName + '/' + item.vt + '</div>' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content einklappen">' + item.tourOperator + '</div>' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" ><a href="#chkOffer" id="chkAvailability' + i + '"><div class="gesamptpreis" >€ ' + item.gPrice + '</div></a></div>' +
                                '<div class="clearfix"></div>' +
                                    /*'<div class="close-sub-div"><img src="<?php bloginfo('template_url') ?>/images/close-34.png" alt="" title=""></div>'+*/
                                '<div class="clearfix"></div>' +
                                '<div class="sub-div-white" style="display: none;">' +
                                '<div class="close-sub-div"><img src="<?php bloginfo('template_url') ?>/images/close-34.png" alt="" title=""></div>' +
                                '<div class="clearfix"></div>';
                            if ($('input[name=flight-option]:checked').val() == 2) {
                                html += '<div class="alternativeFlight_tables"></div>';
                            }
                            html += '</div>' +
                                '</div>' +
                                '<div class="clearfix"></div>' +
                                '<div id="chkOffers' + i + '"></div>';

                            if ($('input[name=flight-option]:checked').val() == 2) {

                                html += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing drop_button_flugafen_down" id="alternative' + i + '" style="display: block; "><img src="<?php bloginfo('template_url') ?>/images/arrow-down-30.png" class="img-responsive text-center arrow-down" alt="" title=""></div>' +
                                    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing drop_button_flugafen_up" style="display: none;"><img src="<?php bloginfo('template_url') ?>/images/arrow-up-30.png" class="img-responsive text-center arrow-up" alt="" title=""></div>';
                            }
                            html += '</div>';
                            // Check For Alternative flights.

                            if ($('input[name=flight-option]:checked').val() == 2) {
                                $(document).off('click', '#alternative' + i + '').on('click', '#alternative' + i + '', function () {
                                   // $(".alternativeFlight_tables").html("");

                                    var chk = 'flight';
                                    var currentdeparturedate = item.date.day + "." + item.date.month + "." + item.date.year;
                                    var currentreturnDate = item.bday.day + "." + item.bday.month + "." + item.bday.year;
                                    var currentdepFlight = item.depFlight;
                                    var currentretFlight = item.retFlight;
                                    helper(i, chk, item.source, item.ref, item.aptd, item.aptdest, item.tourOperator, item.lc, item.uc, item.price, item.ovr, item.travelType, currentdeparturedate, currentreturnDate, currentdepFlight, currentretFlight, item.gPrice);
                                });
                            }

                            // Check the Offer is Available or not.

                            // Unbind all other Click Event when Binding for a Particular Row.

                            $(document).off('click', '#chkAvailability' + i + '').on('click', '#chkAvailability' + i + '', function () {
                                offerCheck(i, item.ref,item.travelType,item.tourOperator,item.source,item.price,item.aptd,item.aptdest,item.lc,item.uc);
                                console.log('send reference'+item.ref);
                            });
                        }
                        });
                    }
                    // Adding the dynamically created Html Tags into the Div for the Table.
                    $("#table_data").html(html);
                    $.getScript("<?php echo bloginfo('template_url') . '/js/dropdownarrow.js' ?>", function () {

                    });
                });
            // Stop the form from submitting the normal way and refreshing the page.
            event.preventDefault();
        }

        // This function is  for Alternative Flight Details and For the Booking.
        function helper(i, chk, source, ref, aptd, aptdest, vc, lc, uc, price, ovr, tourType, currentdeparturedate, currentreturnDate, currentdepFlight, currentretFlight, gprice) {
           //Flight time request

          /*  $.ajax({
                type: 'POST',
                url: '<?php echo bloginfo('template_url') .' /data_checkFlighttime.php' ?>',
                data: {
                    //'journeyType': '2', // $('input[name=journeyType]:checked').val(),//$('input[name=journeyType]:radio:checked').val(),
                    'reference': ref
                    /!* 'travelType': travelType,
                     'tourOperator': tourOperator,
                     'source': source,
                     'preis': preis,
                     'aptd': aptd,
                     'aptdest': aptdest,
                     'lc': lc,
                     'uc': uc*!/



                },
                dataType: "json",
                success: function (data) {
                    // $('.loader').css('display', 'block');
                    console.log(data);



                }
            });*/


            flight();

            function flight() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo bloginfo('template_url') .'/data_flight.php' ?>',
                    data: {
                        'journeyType': '2', // $('input[name=journeyType]:checked').val(),//$('input[name=journeyType]:radio:checked').val(),
                        'departureDate': currentdeparturedate,
                        'returnDate': currentreturnDate,
                        'destination': aptdest,
                        'departureAirport': aptd,
                        'gid': '<?php echo $gid; ?>',
                        'persons': numPerson,
                        'vc': vc,
                        'lc': lc,
                        'uc': uc,
                        //   'zt':$('#ztype').val(),
                        // 'vt':$('#vtype').val(),
                        'reference': ref,
                        'source': source,
                        //'chkFunction':'dataCheckAlternativeFlight',
                    },
                    dataType: "json",
                    success: function (data) {
                        // Empty the Data Every time the Ajax been Called.

                        $(".alternativeFlight_tables").empty();
                        $(".alternativeFlight_tables").html("");

                        if (data.page == 'error') {
                            $(".alternativeFlight_tables").html("<H3>No Flight Information Available</H3>");
                        } else {
                            var dates = data.datesList;
                            var html = '';
                            var n = 0;

                            html += '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content">Flugzeiten</div>' +
                                '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content">Abreise</div>' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content">Zurück</div>' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content"></div>' +
                                '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content">Alternative Flüge</div>' +
                                '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content" id="departureDate_alternative">' + currentdeparturedate + '</div>' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" id="returnDate_alternative">' + currentreturnDate + '</div>' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content"></div>' +
                                '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content"></div>';

                            html += '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content" id="departureTime">' + currentdepFlight + '<div class="clearfix"></div>' +
                                '<div class="airliines-logo"><img src="<?php bloginfo('template_url') ?>/images/AB.png" alt="" title=""></div></div>' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" id="returnTime">' + currentretFlight + '<div class="clearfix"></div>' +
                                '<div class="airliines-logo"><img src="<?php bloginfo('template_url') ?>/images/LH.png" alt="" title=""></div></div>' +
                                '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" id="agprice">' +
                                '<a href="#checkMe" id="offerCheck' + i + "" + n + '"><div class="gesamptpreis">€ ' + gprice + '</div></a>' +
                                '</div>';

                            $(document).off('click', '#offerCheck' + i + "" + n + '').on('click', '#offerCheck' + i + "" + n + '', function () {

                                offerCheck(i, ref);
                                console.log('send reference'+ref);
                            });

                            if (data.dates != 0) {
                                $.each(dates, function (j, item) {
                                    var item = item;
                                    var source = item.source;
                                    var k = j + 1;
                                    html += '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content"></div>' +
                                        '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing table-content" id="departureTime">' + item.depFlight + '<div class="clearfix"></div>' +
                                        '<div class="airliines-logo"><img src="<?php bloginfo('template_url') ?>/images/AB.png" alt="" title=""></div></div>' +
                                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" id="returnTime">' + item.retFlight + '<div class="clearfix"></div>' +
                                        '<div class="airliines-logo"><img src="<?php bloginfo('template_url') ?>/images/LH.png" alt="" title=""></div></div>' +
                                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing table-content" id="agprice">' +
                                        '<a href="#checkMe" id="offerCheck' + i + "" + k + '"><div class="gesamptpreis">€ ' + item.gPrice + '</div></a>' +
                                        '</div>';
                                    $(document).off('click', '#offerCheck' + i + "" + k + '').on('click', '#offerCheck' + i + "" + k + '', function () {
                                        offerCheck(i, item.ref);
                                        console.log('send reference'+item.ref);
                                    });

                                });
                            }
                            $(".alternativeFlight_tables").html(html);
                        }
                    }
                });
            }
        }

        // This function is to check the Availability of the Offer.
        function offerCheck(i, reference,travelType,tourOperator,source,preis,aptd,aptdest,lc,uc) {
            console.log(i, reference,travelType,tourOperator,source,preis,aptd,aptdest,lc,uc);
            $('.loader').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: '<?php echo bloginfo('template_url') .' /data_chkOffers.php' ?>',
                data: {
                    //'journeyType': '2', // $('input[name=journeyType]:checked').val(),//$('input[name=journeyType]:radio:checked').val(),
                    'reference': reference
                   /* 'travelType': travelType,
                    'tourOperator': tourOperator,
                    'source': source,
                    'preis': preis,
                    'aptd': aptd,
                    'aptdest': aptdest,
                    'lc': lc,
                    'uc': uc*/



                },
                dataType: "json",
                success: function (data) {
                    // $('.loader').css('display', 'block');
                   console.log(data);

                    $('#chkOffers' + i + '').empty();
                    $('#chkOffers' + i + '').after(
                        '<div class="alert alert-success alert-dismissable">' +
                        '<button type="button" class="close" ' +
                        'data-dismiss="alert" aria-hidden="true">' +
                        '&times;' +
                        '</button>' +
                        '<center>' +
                        '<font size="5" color="#006400">' +
                        data.BA_MELDUNG +
                        '</font>' +
                        '<br>' + data.FLUGZEIT_CLEAR + '<br>' + 'Gesamt-Reispreis: ' + data.GPREIS + 'Euros' +
                        '</center>' +
                        '<a href="#"><div class="gesamptpreis" >Book Now</div></a>' +

                        '</div>');
                    $('.loader').css('display', 'none');

                    /*if (data.BA_MELDUNG === 'Buchung möglich') {
                        window.location.href = 'http://localhost/wordpress/booking';
                    } else {
                        //$('<div class="alert alert-danger">Das Hotel ist in diesem Zeitraum leider ausgebucht</div>').appendTo('#table_data');
                        $('.loader').css('display', 'none');
                        //$('#bookedUp').fadeOut(8000);
                    }*/
                }
            });
        }
    });
    function calculateAge(birthMonth, birthDay, birthYear) {
        var todayDate = new Date();
        var todayYear = todayDate.getFullYear();
        var todayMonth = todayDate.getMonth();
        var todayDay = todayDate.getDate();
        var age = todayYear - birthYear;

        if (todayMonth < birthMonth - 1) {
            age--;
        }

        if (birthMonth - 1 == todayMonth && todayDay < birthDay) {
            age--;
        }
        return age;
    }
    function parseDate(str) {
        var mdy = str.split('/')
        return new Date(mdy[2], mdy[0]-1, mdy[1]);
    }

    function daydiff(first, second) {
        return Math.round((second-first)/(1000*60*60*24));
    }
</script>
<?php
get_footer();
?>
