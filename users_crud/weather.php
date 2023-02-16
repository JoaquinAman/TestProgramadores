<?php

include 'includes/header.php';

$ip = file_get_contents('https://api.ipify.org');

echo 'Your IP is: ';

echo $ip;

echo "<br>";

$url = "http://api.weatherapi.com/v1/current.json?key=f876c7b517d6413794914830231602&q=$ip&aqi=no";

$json = file_get_contents($url);

$data = json_decode($json, true);

echo 'The city is: ';

echo $data['location']['region'];

echo "<br>";

echo 'The country is: ';

echo $data['location']['country'];

echo "<br>";

echo 'The temperature is: ';

echo $data['current']['temp_c'];

echo "<br>";

?>