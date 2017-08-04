<?php
/*
Author: Fionn Mcguire
Date: 04-08-2017
Description:
    To query statistical and informative information from an owned github repository from command line.


*/
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://github.com/fionnmcguire1/College-Programming");
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

?>
