<?php
get_header();
include_once 'LMwebSoapClient/readCfgFiles/readCfgFiles.php';
$departureAirport = ReadCfgFiles::readCfgFile("../wordpress/wp-content/themes/holidaylifestyle/LMwebSoapClient/cfgFiles/departureAirport.cfg");
$region = ReadCfgFiles::readCfgFile("../wordpress/wp-content/themes/holidaylifestyle/LMwebSoapClient/cfgFiles/destination.cfg");
?>
<div class="content-outside" id="contentOutside">
    <div class="clearfix"></div>
    <div class="span12">
        <div id="owl-demo" class="owl-carousel">
            <div class="item">
                <div class="slider_heading text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">EXPERIENCE</div>
                <div class="slider_subheading text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">Erleben Sie auf einer
                    individuellen Reise die Vielfalt und Kultur eines<br/> Landes. Unsere Experience Reisen...
                </div>
                <img src="<?php bloginfo('template_url'); ?>/images/slide1-25.jpg" alt="" title=""
                     class="img-responsive full-width-img"></div>
            <div class="item">
                <div class="slider_heading text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">PERFECT DAYS</div>
                <div class="slider_subheading text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">Erkunden Sie während
                    einigen Tagen eine neue Stadt, <br/> entspannen Sie im Wellness-Wochenende oder lassen Sie...
                </div>
                <img src="<?php bloginfo('template_url'); ?>/images/slide2-25.jpg" alt="" title=""
                     class="img-responsive full-width-img"></div>
        </div>

        <div class="slider-inside container-fluid nospacing">


        </div>
    </div>
    <div class="container nospacing content" id="ajaxContent">
<?php

if (isset($_GET['back'])) {
    $r_departureDate = $_GET['departureDate'];
    $r_returnDate = $_GET['returnDate'];
    $r_destination = $_GET['destination'];
    $r_journeytype = $_GET['journeyType'];
    $r_departureAirport = $_GET['departureAirport'];
    $r_lmin = $_GET['lmin'];
    $r_lmax = $_GET['lmax'];
    $r_back = $_GET['back'];
    $r_dateType = $_GET['dateType'];
    $r_persons=$_GET['numPersons'];
    $r_vt=$_GET['vt'];
    $r_numkids=$_GET['numKids'];
    if(isset($_GET['ka1']) && $_GET['ka1']!="")
    {
        $r_ka1=$_GET['ka1'];

    }
    if(isset($_GET['ka2']) && $_GET['ka2']!="")
    {
        $r_ka2=$_GET['ka2'];

    }
    if(isset($_GET['ka3'])&& $_GET['ka3']!="")
    {
        $r_ka3=$_GET['ka3'];

    }
    if(isset($_GET['ka4'])&& $_GET['ka4']!="")
    {
        $r_ka4=$_GET['ka4'];

    }
}
else
{
    $r_back = '0';
    $r_departureDate = '';
    $r_returnDate = '';
    $r_destination ='';
    $r_journeytype = '2';
    $r_departureAirport = 'MUCxFRAxDUS';
    $r_lmin = '7';
    $r_lmax ='10';
    $r_dateType = '';
    $r_persons='2';
    $r_vt='';
    $r_numkids='';
    $r_ka1='';
    $r_ka2='';
    $r_ka3='';
    $r_ka4='';
}
?>
<script>

            $(document).ready(function () {
                $('.loader').css('display', 'block');
                var departureAirport = 'MUCxFRAxDUS'; //= $("#departureAirport").val();
                var destination;
                var departureDate;
                var returnDate;
                var lmin='7';
                var lmax='10';
                var journeyType = '2';
                var r_back = '<?php echo $r_back; ?>';
                var dateType;
                var reisedauer;
                var numPersons='2';
                var ka1='',ka2='',ka3='',ka4='';
                var vt='';
                var csetdate1 = '', csetdate2 = '', csetdate3 = '', csetdate4 = '', numKids = '0';
            //select journey type
                $('#von-icon-outer').click(function() {
                    journeyType = '2';
                    $("#departureAirport").prop('disabled', false);
                });

                $('#hotel-icon-outer').click(function() {
                    journeyType = '3';
                    $("#departureAirport").prop('disabled', true);

                });

            // Autocomplete for Departure Airports.
                var airportList = [];
                var firstdate,seconddate;
                var pausecontent = <?php echo json_encode($departureAirport); ?>;

                $.each(pausecontent, function (k, v) {
                    //display the key and value pair
                    airportList.push({label: v, value: k});

                });


                $("#departureAirport").autocomplete({
                    source: airportList,
                    select: function (e, ui) {

                        departureAirport = ui.item.value;
                        $("#departureAirport").val(ui.item.label);
                        return false;


                    }
                });
                // Autocomplete for Destinations

                var destinationList = [];
                var destinationContent = <?php echo json_encode($region); ?>;

                $.each(destinationContent, function (k, v) {
                    //display the key and value pair
                    destinationList.push({label: v, value: k});

                });

            //Refilling the fields if the user comes back from hotel-details

                if(r_back=='1')
                {
                    journeyType='<?php echo $r_journeytype; ?>';
                    departureAirport = '<?php echo $r_departureAirport; ?>';
                    destination = '<?php echo $r_destination; ?>';
                    departureDate = '<?php echo $r_departureDate; ?>';
                    returnDate = '<?php echo $r_returnDate; ?>';
                    lmin = '<?php echo $r_lmin; ?>';
                    lmax = '<?php echo $r_lmax; ?>';
                    var r_dateType= '<?php echo $r_dateType; ?>';
                    numPersons='<?php echo $r_persons; ?>';
                    vt='<?php echo $r_vt; ?>';
                    dateType=r_dateType;
                    numKids='<?php echo $r_numkids; ?>';
                    // Search with the previous parameters.

                    //Make Type of Journey Selected
                    if(journeyType=='2')
                    {
                          $('#von-icon-outer').toggleClass('icon-active');
                    }
                    else if(journeyType=='3')
                    {
                        $('#hotel-icon-outer').toggleClass('icon-active');
                    }
                    // convert the dates to fill them again in the input fields.
                    var year        = departureDate.substring(0,2);
                    var month       = departureDate.substring(2,4);
                    var day         = departureDate.substring(4,6);
                    var set_departureDate=day+'/'+month+'/'+'20'+year;
                    var r_year        = returnDate.substring(0,2);
                    var r_month       = returnDate.substring(2,4);
                    var r_day         = returnDate.substring(4,6);
                    var set_returnDate=r_day+'/'+r_month+'/'+'20'+r_year;
                    //set different input box for exact and Flexible date
                    if(r_dateType=='e')
                    {
                        $('.datum-tabs a[href="#exakte"]').tab('show');
                    $('#date-picker3').val(set_departureDate);
                    $('#date-picker4').val(set_returnDate);
                    $('#datum-id').val($('#date-picker3').val()+' | '+ $('#date-picker4').val());
                    }
                    else if(r_dateType=='f')
                    {
                        $('.datum-tabs a[href="#flexible"]').tab('show');
                        $('#date-picker1').val(set_departureDate);
                        $('#date-picker2').val(set_returnDate);
                        //set the reisedauer
                        if(lmin!=lmax)
                        {
                            reisedauer=lmin+'-'+lmax;
                        }
                        else
                        {
                            reisedauer=lmin;
                        }
                        $('#reisedauer').val(reisedauer);
                        if ($('#reisedauer').val() == 1) {
                            var value = $('#date-picker1').val() + ' | ' + $('#date-picker2').val() + " | " + $('#reisedauer').val() + " Nacht";
                        }
                        else {
                            var value = $('#date-picker1').val() + ' | ' + $('#date-picker2').val() + " | " + $('#reisedauer').val() + " Nächte";
                        }
                        $('#datum-id').val(value);

                    }

                    // convert departureAirport and destination field back to readable format.
                    for(i in airportList) {
                        if(departureAirport==airportList[i].value)
                        {
                            $("#departureAirport").val(airportList[i].label);
                        }
                    }
                    for(i in destinationList) {
                        if(destination==destinationList[i].value.split('|')[1])
                        {
                            $("#destination").val(destinationList[i].label);
                        }

                    }
                    //set Type of Verglegugn
                    $('#verflegung').val(vt);
                //Set number Of Persons

                    $('#persons').val(numPersons);
                    $('#chooseKids2').val(numKids);
                    if(numKids=='1')
                    {

                        $('#date-picker15').val('<?php echo $r_ka1;?>');
                        $('.onekid').show();

                    }
                    if(numKids=='2')
                    {
                        $('#date-picker15').val('<?php echo $r_ka1;?>');
                        $('#date-picker16').val('<?php echo $r_ka2;?>');
                        $('.onekid').show();
                        $('.twokid').show();
                    }
                    if(numKids=='3')
                    {
                        $('#date-picker15').val('<?php echo $r_ka1;?>');
                        $('#date-picker16').val('<?php echo $r_ka2;?>');
                        $('#date-picker17').val('<?php echo $r_ka3;?>');
                        $('.onekid').show();
                        $('.twokid').show();
                        $('.threekid').show();
                    }
                    if(numKids=='4')
                    {
                        $('#date-picker15').val('<?php echo $r_ka1;?>');
                        $('#date-picker16').val('<?php echo $r_ka2;?>');
                        $('#date-picker17').val('<?php echo $r_ka3;?>');
                        $('#date-picker18').val('<?php echo $r_ka4;?>');
                        $('.onekid').show();
                        $('.twokid').show();
                        $('.threekid').show();
                        $('.fourkid').show();
                    }

                    if (numKids == '0') {
                        var str_kind = ' Kinder';
                    } else if (numKids > '1') {
                        var str_kind = ' Kinder';

                    } else {
                        var str_kind = ' Kind';
                    }

                    if (numPersons > '1') {
                        var str_person = ' Erwachsene ';
                    } else {
                        var str_person = ' Erwachsener ';
                    }
                    $('#sonstiges').val($('#verflegung :selected').text()+' | '+numPersons+str_person+' | ' + numKids + str_kind);


                    //CAll the Ajax Function
                    requestSearchData();
                }

                //Autocomplete Destination
                $("#destination").autocomplete({
                    source: destinationList,
                    focus: function (event, ui) {
                        // prevent autocomplete from updating the textbox
                        //  event.preventDefault();
                        destination = ui.item.value;
                        return false;
                        // manually update the textbox
                    },
                    select: function (e, ui) {
                        // event.preventDefault();
                        var partsOfStr = ui.item.value.split('|');
                        destination = partsOfStr[1];
                        $("#destination").val(ui.item.label);
                        // Prevent Default Behavior.
                        return false;
                    }
                });

                //Exact date Button click
                $('#button-click').on('click', function () {
                    dateType = 'e';

                    if ($('#date-picker3').val() == null) {
                        departureDate = '1';
                    }
                    else {
                        var test = $('#date-picker3').val();
                        var newdate = test.split("/").reverse();
                        var year = newdate[0].split("20");
                        var yearn = year[1];
                        var month = newdate[1];
                        var day = newdate[2];
                        departureDate = year.concat(month, day).join("");
                        firstdate=new Date(newdate[0],month,day);

                    }
                    // convert Returndate to YYMMDD format for the Ajax Request.

                    if ($('#date-picker4').val() == null) {
                        returnDate = '21';
                    }
                    else {
                        var test1 = $('#date-picker4').val();

                        var newdate1 = test1.split("/").reverse();
                        var year1 = newdate1[0].split("20");
                        var yearn1 = year1[1];
                        var month1 = newdate1[1];
                        var day1 = newdate1[2];
                        returnDate = year1.concat(month1, day1).join("");
                        seconddate=new Date(newdate1[0],month1,day1);
                        //
                        // console.log(returnDate);
                    }


                    var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                    var diffDays = Math.round(Math.abs((firstdate.getTime() - seconddate.getTime())/(oneDay)));

                    lmin=diffDays-1;
                    lmax=diffDays-1;
                });
                //If User Selects Flexible Dates
                $('#flexibleDatenUbernehmen').click(function() {
                    dateType = 'f';

                    if ($('#date-picker1').val() == null) {
                        departureDate = '1';
                    }
                    else {
                        var test = $('#date-picker1').val();
                        var newdate = test.split("/").reverse();
                        var year = newdate[0].split("20");
                        var yearn = year[1];
                        var month = newdate[1];
                        var day = newdate[2];
                        departureDate = year.concat(month, day).join("");
                        firstdate=new Date(newdate[0],month,day);

                    }
                    // convert Returndate to YYMMDD format for the Ajax Request.

                    if ($('#date-picker2').val() == null) {
                        returnDate = '21';
                    }
                    else {
                        var test1 = $('#date-picker2').val();
                        var newdate1 = test1.split("/").reverse();
                        var year1 = newdate1[0].split("20");
                        var yearn1 = year1[1];
                        var month1 = newdate1[1];
                        var day1 = newdate1[2];
                        returnDate = year1.concat(month1, day1).join("");
                        seconddate=new Date(newdate1[0],month1,day1);
                        //
                        // console.log(returnDate);
                    }
                    var nights = $('#reisedauer').val()

                    if(nights.indexOf('-') >= 0)
                    {
                        nights=nights.split('-');
                        lmin=nights[0];
                        lmax=nights[1];

                    }
                    else
                    {
                        lmin=nights;
                        lmax=nights;
                    }
                });
                //If user Selects Number of Persons

                $('#getNumOfPersons_home').click(function () {
                    numPersons = $('#persons').val();
                    numKids = $('#chooseKids2').val();
                    vt=$('#verflegung').val();

                    if (numKids == '0') {
                        var str_kind = ' Kinder';
                    }
                    else if (numKids > '1') {
                        var str_kind = ' Kinder';

                    } else {
                        var str_kind = ' Kind';
                    }
                    if (numPersons > '1') {
                        var str_person = 'Erwachsene ';
                    } else {
                        var str_person = 'Erwachsener ';
                    }
                    $('#reiseteilnehmer').val(numPersons + ' ' + str_person + ' | ' + numKids + str_kind);

                });




                // Submit User Input.
                $('#header_submit').submit(function (event) {
                    // convert Departuredate to YYMMDD format for the Ajax Request.
                    //Default Journey-Type for Dev.
                    $('.loader').css('display', 'block');
                    // Make an Ajax Request to data_json for the Available Offers.
                    requestSearchData();
                    // stop the form from submitting the normal way and refreshing the page
                    event.preventDefault();
                });

                function requestSearchData()
                {
                    //calculate the age of the children
                    if (numKids == '1') {

                        var pickerVal1 = $('#date-picker15').val();
                        var cdate1 = pickerVal1.split("/").reverse();
                        var cyear1 = cdate1[0];
                        var cmonth1 = cdate1[1];
                        var cday1 = cdate1[2];
                        csetdate1 = calculateAge(cmonth1, cday1, cyear1);
                    }

                    if (numKids == '2') {
                        var pickerVal1 = $('#date-picker15').val();
                        var cdate1 = pickerVal1.split("/").reverse();
                        var cyear1 = cdate1[0];
                        var cmonth1 = cdate1[1];
                        var cday1 = cdate1[2];
                        csetdate1 = calculateAge(cmonth1, cday1, cyear1);
                        //console.log(csetdate1);
                        var pickerVal2 = $('#date-picker16').val();
                        var cdate2 = pickerVal2.split("/").reverse();
                        var cyear2 = cdate2[0];
                        var cmonth2 = cdate2[1];
                        var cday2 = cdate2[2];
                        csetdate2 = calculateAge(cmonth2, cday2, cyear2);
                    }
                    if (numKids == '3') {
                        var pickerVal1 = $('#date-picker15').val();
                        var cdate1 = pickerVal1.split("/").reverse();
                        var cyear1 = cdate1[0];
                        var cmonth1 = cdate1[1];
                        var cday1 = cdate1[2];
                        csetdate1 = calculateAge(cmonth1, cday1, cyear1);
                        //console.log(csetdate1);
                        var pickerVal2 = $('#date-picker16').val();
                        var cdate2 = pickerVal2.split("/").reverse();
                        var cyear2 = cdate2[0];
                        var cmonth2 = cdate2[1];
                        var cday2 = cdate2[2];
                        csetdate2 = calculateAge(cmonth2, cday2, cyear2);
                        //console.log(csetdate2);
                        var pickerVal3 = $('#date-picker17').val();
                        var cdate3 = pickerVal3.split("/").reverse();
                        var cyear3 = cdate3[0];
                        var cmonth3 = cdate3[1];
                        var cday3 = cdate3[2];
                        csetdate3 = calculateAge(cmonth3, cday3, cyear3);

                    }
                    if (numKids == '4') {
                        var pickerVal1 = $('#date-picker15').val();
                        var cdate1 = pickerVal1.split("/").reverse();
                        var cyear1 = cdate1[0];
                        var cmonth1 = cdate1[1];
                        var cday1 = cdate1[2];
                        csetdate1 = calculateAge(cmonth1, cday1, cyear1);
                        //console.log(csetdate1);
                        var pickerVal2 = $('#date-picker16').val();
                        var cdate2 = pickerVal2.split("/").reverse();
                        var cyear2 = cdate2[0];
                        var cmonth2 = cdate2[1];
                        var cday2 = cdate2[2];
                        csetdate2 = calculateAge(cmonth2, cday2, cyear2);
                        //console.log(csetdate2);
                        var pickerVal3 = $('#date-picker17').val();
                        var cdate3 = pickerVal3.split("/").reverse();
                        var cyear3 = cdate3[0];
                        var cmonth3 = cdate3[1];
                        var cday3 = cdate3[2];
                        csetdate3 = calculateAge(cmonth3, cday3, cyear3);
                        //console.log(csetdate3);
                        var pickerVal4 = $('#date-picker18').val();
                        var cdate4 = pickerVal4.split("/").reverse();
                        var cyear4 = cdate4[0];
                        var cmonth4 = cdate4[1];
                        var cday4 = cdate4[2];
                        csetdate4 = calculateAge(cmonth4, cday4, cyear4);
                    }
                    var send_data_home = {};
                    send_data_home = {
                        'journeyType': journeyType,
                        'numPersons':numPersons,
                        'departureDate': departureDate,
                        'returnDate': returnDate,
                        'destination': destination,
                        'departureAirport': departureAirport,
                        'chkFunction': 'dataHome',
                        'lmin':lmin,
                        'lmax':lmax
                    };
                   if(vt!='')
                   {
                       send_data_home['vt'] = vt;
                   }
                    if (numKids == '1') {
                        send_data_home['ka1'] = csetdate1;
                        ka1=$('#date-picker15').val();
                    }
                    if (numKids == '2') {
                        send_data_home['ka1'] = csetdate1;
                        send_data_home['ka2'] = csetdate2;
                        ka1=$('#date-picker15').val();
                        ka2= $('#date-picker16').val();
                    }
                    if (numKids == '3') {
                        send_data_home['ka1'] = csetdate1;
                        send_data_home['ka2'] = csetdate2;
                        send_data_home['ka3'] = csetdate3;
                        ka1=$('#date-picker15').val();
                        ka2= $('#date-picker16').val();
                        ka3=$('#date-picker17').val();
                    }
                    if (numKids == '4') {
                        send_data_home['ka1'] = csetdate1;
                        send_data_home['ka2'] = csetdate2;
                        send_data_home['ka3'] = csetdate3;
                        send_data_home['ka4'] = csetdate4;
                        ka1=$('#date-picker15').val();
                        ka2= $('#date-picker16').val();
                        ka3=$('#date-picker17').val();
                        ka4=$('#date-picker18').val();
                    }
                    $.ajax({
                            type: 'POST',
                            url: '../wordpress/wp-content/themes/holidaylifestyle/data_json.php',
                            data: send_data_home,
                            dataType: 'json',
                            encode: true
                        })
                        .done(function (data) {
                            // var err for checking if there are Results or not.
                            console.log(data);
                            var err = 0;

                            // Compare the Response to the existing gid's and push them into the array.
                            var gid = [];
                            for (var i = 0; i < data.offersList.length; i++) {
                               // if(data.offersList[i].days >= lmin && data.offersList[i].days <= lmax)


                                    gid.push(data.offersList[i].gid);

                            }
                            for (var i = 0; i < gid.length; i++) {
                                var tmpGid1 = gid[i];
                                for (var j = 0; j < gid.length; j++) {

                                    if (tmpGid1 == $('mark').eq(j).html()) {
                                        console.log('data Found');
                                        err = err + 1;
                                    }
                                }

                            }
                            if (err == 0) {
                                $("#noResults").html("<H1>Leider keine Angebote gefunden. Bitte passen Sie die Filterkriterien an oder setzen Sie die letzte Auswahl zurück.</H1>");
                                // #noResults tag is defined in init.php file which will hide all the details beneath it.
                                $('#errorMessage').after(
                                    '<div class="alert alert-success alert-dismissable">' +
                                    '<button type="button" class="close" ' +
                                    'data-dismiss="alert" aria-hidden="true">' +
                                    '&times;' +
                                    '</button>' +
                                    '<center>' +
                                    '<font size="6" color="#006400">' +
                                    "Keine Angebote Verfügbar" +
                                    '</font>' +
                                    '</center>' +
                                    '</div>');
                                $('.loader').css('display', 'none');
                            }
                            else {
                                // Display the matching Elements.
                                $('.hotels-show').css('display', 'block');
                                $('.drop_button_up').show();
                                $('.drop_button_down').hide();

                                // scroll to the hotelslist.
                                $('html, body').animate({
                                    scrollTop: $('.parent:visible:first').offset().top
                                }, 2000);

                                // delay for loader gif.
                                $('.loader')
                                    .delay(1200)
                                    .queue(function (next) {
                                        $(this).css('display', 'none');
                                        next();
                                    });

                                $(document).ready(function () {
                                    $('.children').removeClass('visible');
                                    // set the get Parameters to fetch them on the hotel-details page.
                                    var readMoreDetails =
                                        '<input type="hidden" name="departureDate" value="' + departureDate + '">' +
                                        '<input type="hidden" name="returnDate" value="' + returnDate + '">' +
                                        '<input type="hidden" name="destination" value="' + destination + '">' +
                                        '<input type="hidden" name="journeyType" value="' + journeyType + '">' +
                                        '<input type="hidden" name="departureAirport" value="' + departureAirport + '">'+
                                        '<input type="hidden" name="lmin" value="' + lmin + '">'+
                                        '<input type="hidden" name="lmax" value="' + lmax + '">'+
                                        '<input type="hidden" name="dateType" value="' + dateType + '">'+
                                        '<input type="hidden" name="numPersons" value="' + numPersons + '">'+
                                        '<input type="hidden" name="ka1" value="'+ ka1 + '">'+
                                        '<input type="hidden" name="ka2" value="' + ka2 + '">'+
                                        '<input type="hidden" name="ka3" value="' + ka3 + '">'+
                                        '<input type="hidden" name="ka4" value="' + ka4 + '">'+
                                        '<input type="hidden" name="vt" value="' + vt + '">'+
                                        '<input type="hidden" name="numKids" value="' + numKids + '">';

                                    //'<input type="hidden" name="departureAirport" value="' + departureAirport + '">'+
                                    //'<input type="hidden" name="airportList" value="' + airportList + '">';
                                    $('.weiter_form').append(readMoreDetails);
                                    // Hide the child Elements initially.
                                    $('.children').hide();
                                    // check the gid's and show the matching Elements.
                                    for (var i = 0; i < gid.length; i++) {

                                        var tmpGid = gid[i];
                                        for (var j = 0; j < gid.length; j++) {
                                            if (tmpGid == $('mark').eq(j).html()) {

                                                //var ind = gid.indexOf($('mark').eq(j).html());
                                                $('.parent').hide();
                                                $('.children:contains("' + tmpGid + '")').show();
                                                $('.children:contains("' + tmpGid + '")').addClass('visible');
                                                $('.children:contains("' + tmpGid + '")').parent().parent().show();

                                                // TODO: Check helper.js for duplicate function.
                                                var childrenLength = $('.filtered').length;
                                                if (childrenLength < 2) {
                                                    $('.hotelCount').html(childrenLength + ' Hotel');
                                                } else {
                                                    $('.hotelCount').html(childrenLength + ' Hotels');
                                                }

                                                var offers = data.offersList;
                                                var destinationRegion = [];

                                                $.each(offers, function (i, item) {
                                                    //add all destination region  with unique name
                                                    if ($.inArray(offers[i].hotelDst, destinationRegion) == -1)
                                                        destinationRegion.push(offers[i].hotelDst);

                                                });
                                                var path = "../wordpress/wp-content/themes/holidaylifestyle";
                                                //$.getScript("../wordpress/wp-content/themes/holidaylifestyle/js/scripts.js", function () {

                                                //});
                                            }
                                        }
                                    }

                                });
                            } //Finish of Else Condition
                            $('.parent').each(function () {
                                var hotels = $(this).find('.visible').length;
                                console.log(hotels);
                                var count = $(this).find('.hotelCount');
                                if (hotels < 2) {
                                    count.html(hotels + ' Hotel');
                                } else {
                                    count.html(hotels + ' Hotels');
                                }
                            });
                        }).fail(function () {
                        $('.loader').css('display', 'none');
                    });

                }
            }); // document.ready.

            function parseDate(str) {
                var mdy = str.split('/');
                return new Date(mdy[2], mdy[0]-1, mdy[1]);
            }

            function daydiff(first, second) {
                return Math.round((second-first)/(1000*60*60*24));
            }
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
        </script>

        <?php
        // get Parent and Child Elements.
        require '../wordpress/wp-content/themes/holidaylifestyle/init.php';
        require '../wordpress/wp-content/themes/holidaylifestyle/childs_init.php';
        ?>
    </div>
</div>
<!--Input fields for taking the focus in the datepicker (page-header).-->
<input type="text" id="focus" readonly>
<input type="text" id="focus2" readonly>
<?php
get_footer();
?>

