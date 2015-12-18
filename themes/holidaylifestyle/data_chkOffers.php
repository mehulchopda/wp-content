<?php


/*$homepage = file_get_contents('http://web3dev.travel-it.com/TravelItMixer/Mixer?
CFG=235&XPWP=HR74A69Q&SF=1&RA=2&VON=1&BIS=21&ZIEL=AS&JSON=1&RW=DUS
');
echo $homepage;*/
header('content-type: text/html; charset=iso-8859-1');
$ref=$_POST['reference'];
//$journeyType=$_POST['journeyType'];
//$departureDate=$_POST['departureDate'];
//$returnDate=$_POST['returnDate'];
/*$aptd=$_POST['aptd'];
$aptdest=$_POST['aptdest'];
$travelType=$_POST['travelType'];
//$persons=$_POST['persons'];
$tourOperator=$_POST['tourOperator'];
//$zt=$_POST['zt'];
//$vt=$_POST['vt'];
//$book=$_POST['reference'];
$src=$_POST['source'];
//$vc = $_POST['vc'];
$lc=$_POST['lc'];

$preis = $_POST['preis'];

$uc = $_POST['uc'];*/
// $('input[name=journeyType]:checked').val(),//$('input[name=journeyType]:radio:checked').val(),
                    //'reference': reference

/*$uc = preg_replace('/\s+/', '', $uc);*/
/*$price = $_POST['price'];
//$ovr = $_POST['ovr'];
$tourType = $_POST['tourType'];*/
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
       'OFFER'=>$ref,
        'JSON' => '1',
       /* 'SF'=>'2',
        'OVR'=>'0',
       'XPWP' => 'HR74A69Q',
        'REISEART' => $travelType,
        'VERANST'=>$tourOperator,
        'SOURCE'=>$src,
        'RA' => '2',
        'PREIS'=>$preis,
        'APTD'=>$aptd,
        'APTDEST'=>$aptdest,
        'DATUM' =>'02.12.15',
        'RRTAG' =>'04.12.15',
        'LC'=>$lc,
        'UC'=>$uc,*/

           )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('http://web3dev.travel-it.com/buma/doBZ3.php',false, $context);
echo $result;

?>