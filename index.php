<?php

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

$user_ip = getUserIP();
$ipFile="abd581f82d3d3b2346ad9412653ca1b9db26c2f5cf8795a5dc2100c8cfc36c32d3cd86ccc1aef427ef3d31fab9bcb849e41c62cc0e5a1244f444282fefab0b71";

include ('./jdf.php');
$day_number = jdate('j');
$month_number = jdate('n');
$year_number = jdate('y');
$day_name = jdate('l');
date_default_timezone_set('Asia/Tehran');


$StringToWrite=$user_ip.PHP_EOL.date('H:i:s').PHP_EOL.'Day was ='. $day_number.'-'.$month_number.'-'.$year_number.PHP_EOL."=================".PHP_EOL;

$FileHandler=fopen($ipFile,'a+');
fwrite($FileHandler,$StringToWrite);
fclose($FileHandler);
header("Location: https://www.imdb.com/list/ls027433291/");
die();
?>
