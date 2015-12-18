<?php
/*$homepage = file_get_contents('http://web3dev.travel-it.com/TravelItMixer/Mixer?
CFG=235&XPWP=HR74A69Q&SF=1&RA=2&VON=1&BIS=21&ZIEL=AS&JSON=1&RW=DUS
');
echo $homepage;*/
header('content-type: text/html; charset=iso-8859-1');
if($_POST['chkFunction']=='dataHome')
{
    $data=dataHome();
}
if($_POST['chkFunction']=='dataBooking')
{
    $data=dataBooking();
}
if($_POST['chkFunction']=='dataCheckAlternativeFlight')
{
    $data=dataCheckAlternativeFlight();
}

function dataHome()
{
    if($_POST)
    {
        $journeyType=$_POST['journeyType'];
        $departureDate=$_POST['departureDate'];
        $returnDate=$_POST['returnDate'];
        $destination=$_POST['destination'];
        $lmin=$_POST['lmin'];
        $lmax=$_POST['lmax'];
        $numPersons=$_POST['numPersons'];
    }
    $data=array(
        'CFG' => '235',
        'XPWP' => 'HR74A69Q',
        'SF' => $journeyType,//Journey Type-Journey
        'RA' => $numPersons,//Number of Persons
        'VON' => $departureDate,
        'BIS' => $returnDate,
        'ZIEL' => $destination,
        'JSON' => '1',
       // 'RW' => $departureAirport,
        'TPS'=>'70',
        'LMIN'=>$lmin,//To minimize the response time we should set min and max time of duration
        'LMAX'=>$lmax,
        // 'RFR'=>'xtrak',
        'MGRP' => '1',//Group offer Page
        'APS' => '60',//To increse the return result it can be set up to 1600(This basically increase the regions on the home page)
        'MDS' => '0',//To skip the region page while not entering any region or destination
        //'ZA'=>'1',//setting the Zimmer type
    );
   /* if($lmin!=$lmax)
    {
        $data['LMIN']=$lmin;
        $data['LMAX']=$lmax;
    }*/
    if(isset($_POST['vt'])){
        if($_POST['vt']!='0')
        $data['GTMEAL']=$_POST['vt'];
    }
    if(isset($_POST['departureAirport'])){
        $data['RW']=$_POST['departureAirport'];
    }
    if(isset($_POST['ka1'])){
        $data['KA1']=$_POST['ka1'];
    }
    if(isset($_POST['ka2'])){
        $data['KA2']=$_POST['ka2'];
    }
    if(isset($_POST['ka3'])){
        $data['KA3']=$_POST['ka3'];
    }
    if(isset($_POST['ka4'])){
        $data['KA4']=$_POST['ka4'];
    }
    $postdata = http_build_query($data);
    return $postdata;
}

function dataBooking(){
    $journeyType=$_POST['journeyType'];
    $departureDate=$_POST['departureDate'];
    $returnDate=$_POST['returnDate'];
    $destination=$_POST['destination'];
    $departureAirport=$_POST['departureAirport'];
    $gid=$_POST['gid'];
    $persons=$_POST['persons'];
  //  $zt=$_POST['zt'];
   // $vt = $_POST['vt'];
    $lmin = $_POST['lmin'];
    $lmax = $_POST['lmax'];

//$vc = $_POST['vc'];
//$lc=$_POST['lc'];
//$uc = $_POST['uc'];
//$dlc=$_POST['dlc'];
    $data=array(
        'CFG' => '235',
        'XPWP' => 'HR74A69Q',
        'SF' => $journeyType,
        'RA' => $persons,
        'VON' => $departureDate,
        'BIS' => $returnDate,
        'LMIN'=>$lmin,//To minimize the response time we should set min and max time of duration
        'LMAX'=>$lmax,
        'ZIEL' => $destination,
        'JSON' => '1',
        //  'FCB'=>'1',
     //   'RW' => $departureAirport,
        // 'MGRP'=>'2',
        'GID'=>$gid,//set hotel unique GId
        //'VC'=>$vc,
        //'HOTEL'=>'|'.$lc.'|'.$uc,
        'MGRP'=>'1',
      //  'ZA'=>$zt,//Type of Zimmer
        'TPS'=>'70',//Maximize the number of results max-400,
        'APS'=>'60',
        'TSORT'=>'PRICE',//sorting of the result based on date
        //'FCB'=>'1'
        // 'GTMEAL'=>$vt,//Set Type Of Meal,

        //'MDS'=>'0',
        // 'VA'=>'0',//Type of Board
    );
  /*  if($lmin!=$lmax)
    {
        $data['LMIN']=$lmin;
        $data['LMAX']=$lmax;
    }*/
    if(isset($_POST['departureAirport'])){
        $data['RW']=$_POST['departureAirport'];
    }
    if(isset($_POST['zt'])){
        $data['ZA']=$_POST['zt'];
    }
    if(isset($_POST['vt'])){
        if($_POST['vt']!='0')
        $data['GTMEAL']=$_POST['vt'];
    }
    if(isset($_POST['ka1'])){
        $data['KA1']=$_POST['ka1'];
    }
    if(isset($_POST['ka2'])){
        $data['KA2']=$_POST['ka2'];
    }
    if(isset($_POST['ka3'])){
        $data['KA3']=$_POST['ka3'];
    }
    if(isset($_POST['ka4'])){
        $data['KA4']=$_POST['ka4'];
    }

    $postdata = http_build_query($data);
    return $postdata;
}

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $data
    )
);
$context  = stream_context_create($opts);
$result = file_get_contents('http://web3dev.travel-it.com/TravelItMixer/Mixer', false, $context);
echo $result;

?>