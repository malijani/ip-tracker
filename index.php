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
header("Location: https://www.asriran.com/fa/news/9274/%D8%AC%D9%86%DA%AF-%D8%B1%D9%88%D8%A7%D9%86%DB%8C-%D8%AC%D8%AF%DB%8C%D8%AF-%D8%B4%D8%A7%DB%8C%D8%B9%D9%87-%D9%81%D9%88%D8%AA-%D8%B1%D9%87%D8%A8%D8%B1-%D8%A7%DB%8C%D8%B1%D8%A7%D9%86-%D8%AF%D8%B1-%D8%B1%D8%B3%D8%A7%D9%86%D9%87-%D9%87%D8%A7%DB%8C-%D8%B1%D9%88%D8%B2-%D8%AC%D9%85%D8%B9%D9%87-%D8%BA%D8%B1%D8%A8");
die();
?>
