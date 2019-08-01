<?php

$curl = curl_init("https://vermontshakespearecompany.wordpress.com/feed/");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
?>