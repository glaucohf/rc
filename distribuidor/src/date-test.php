<?php
// from 28/04/2020 21:27
// to 2020-04-27T21:35:2

//date_default_timezone_set('America/Sao_Paulo'); //Com horário de verão
date_default_timezone_set('America/Recife'); //Sem horário de verão
$timeStr = "28/04/2020 21:27";
$dateArray=explode("/", $timeStr);
$day=$dateArray[0];
$month=$dateArray[1];
$yearAndTime=$dateArray[2];
$yearAndTimeArray=explode(" ", $yearAndTime);
$year=$yearAndTimeArray[0];
$time=$yearAndTimeArray[1];


$agendorDate=$year."-".$month."-".$day."T".$time;

echo "Data para agendor: ";
echo $agendorDate;
echo "\n";

$time =  strtotime($timeStr);
echo $time;
echo "\n";
$date = date('Y-m-d\TH:i:s', $time);
echo $date;


//$today=date('d-m-Y');
//$today=explode("-", $today);
//$tomorrow=date("d-m-Y", mktime(0, 0, 0, $today[1], $today[0] + 1, $today[2]));
//Converter formato de dd-mm-yyyy para yyyy-mm-dd
//$tomorrow_agendor=explode("-", $tomorrow);
//$day=$tomorrow_agendor[0];
//$month=$tomorrow_agendor[1];
//$year=$tomorrow_agendor[2];
//$tomorrow_agendor=$year."-".$month."-".$day."T10:00:00.000Z";

?>
