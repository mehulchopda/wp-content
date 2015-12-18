<?php


/*$homepage = file_get_contents('http://web3dev.travel-it.com/TravelItMixer/Mixer?
CFG=235&XPWP=HR74A69Q&SF=1&RA=2&VON=1&BIS=21&ZIEL=AS&JSON=1&RW=DUS
');
echo $homepage;*/
header('content-type: text/html; charset=iso-8859-1');
$journeyType=$_GET['journeyType'];
$departureDate=$_GET['departureDate'];
$returnDate=$_GET['returnDate'];
$destination=$_GET['destination'];
$departureAirport=$_GET['departureAirport'];
$gid=$_GET['gid'];
$persons=$_GET['persons'];
$zt=$_GET['zt'];

//$vc = $_POST['vc'];
//$lc=$_POST['lc'];
//$uc = $_POST['uc'];
//$dlc=$_POST['dlc'];

/* if(isset($_GET['gid']))
 {

 }
 if(isset($_GET['vc'])) {
     $vc = $_GET['vc'];
 }
 if(isset($_GET['lc']))
 {}

     if(isset($_GET['uc'])) {


     }*/

//$departureDate = DateTime::createFromFormat('YMD', $departureDate);
//$returnDate = DateTime::createFromFormat('YMD', $returnDate);
//$departureDate=$departureDate->format('Y-m-d');
//$returnDate=$returnDate->format('Y-m-d');
//$departureDate = preg_replace("","/[\s-]+/", $departureDate);
//$returnDate = preg_replace("","/[\s-]+/", $returnDate);
$data=array(
    'CFG' => '235',
    'XPWP' => 'HR74A69Q',
    'SF' => $journeyType,
    'RA' => $persons,
    'VON' => $departureDate,
    'BIS' => $returnDate,
    //'LMIN'=>'7',//To minimize the response time we should set min and max time of duration
    // 'LMAX'=>'10',
    'ZIEL' => $destination,
    'JSON' => '1',
    'RW' => $departureAirport,
    // 'MGRP'=>'2',
    'GID'=>$gid,//set hotel unique GId
    //'VC'=>$vc,
    //'HOTEL'=>'|'.$lc.'|'.$uc,
    'MGRP'=>'1',
    'ZA'=>$zt,//Type of Zimmer
    'TPS'=>'100',//Maximize the number of results max-400
    'TSORT'=>'PRICE',//sorting of the result based on date
    // 'GTMEAL'=>$vt,//Set Type Of Meal
    //'MDS'=>'0',
    // 'VA'=>'0',//Type of Board
);

if(isset($_GET['vt'])){
//array_push($data, array('GTMEAL'=>$_GET['vt']));
    $data['GTMEAL']=$_GET['vt'];
}

$postdata = http_build_query($data);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('http://web3dev.travel-it.com/TravelItMixer/Mixer', false, $context);
echo $result;

?>