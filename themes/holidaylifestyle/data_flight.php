<?php


/*$homepage = file_get_contents('http://web3dev.travel-it.com/TravelItMixer/Mixer?
CFG=235&XPWP=HR74A69Q&SF=1&RA=2&VON=1&BIS=21&ZIEL=AS&JSON=1&RW=DUS
');
echo $homepage;*/
header('content-type: text/html; charset=iso-8859-1');
$journeyType=$_POST['journeyType'];
$departureDate=$_POST['departureDate'];
$returnDate=$_POST['returnDate'];
$destination=$_POST['destination'];
$departureAirport=$_POST['departureAirport'];
$gid=$_POST['gid'];
$persons=$_POST['persons'];
//$zt=$_POST['zt'];
//$vt=$_POST['vt'];
$book=$_POST['reference'];
$src=$_POST['source'];
$vc = $_POST['vc'];
$lc=$_POST['lc'];
$uc = $_POST['uc'];
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

$postdata = http_build_query(
    array(
        'CFG' => '235',
        'XPWP' => 'HR74A69Q',
        'SF' => $journeyType,
         'RA' => $persons,
        'VON' => $departureDate,
        'BIS' => $returnDate,
        'ZIEL' => $destination,
        'JSON' => '1',
        // 'RW' => $departureAirport,

        'GID'=>$gid,//set hotel unique GId
        //'LMIN'=>'7',//To minimize the response time we should set min and max time of duration
        //'LMAX'=>'10',
         'VC'=>$vc,
        // 'HOTEL'=>'|'.$lc.'|'.$uc,
        'MGRP'=>'1',
        // 'ZA'=>$zt,//Type of Zimmer
        //  'TPS'=>'100',//Maximize the number of results max-400
        // 'TSORT'=>'DATE',//sorting of the result based on date
        // 'GTMEAL'=>$vt,//Set Type Of Meal
        'SOURCE'=>$src,
        'BOOK'=>$book,
        //'VA'=>'3',//Type of Board




    )
);
/*var_dump($postdata);*/

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('http://web3dev.travel-it.com/TravelItMixer/MixerFlightInfoServlet', false, $context);
echo $result;

?>