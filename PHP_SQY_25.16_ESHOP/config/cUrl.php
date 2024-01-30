<?php
/*     
what is cUrl?
in simple words , it is one canal for using one or a lot
of API
So you must know it 
*/
$url = "https://fakestoreapi.com/products";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$resp = curl_exec($ch);

if ($e = curl_errno($ch)) {
    var_dump($e);

} else {
    $products = json_decode($resp, true);
}


curl_close($ch);
