<?php

$dsn = "mysql:dbname=eshop;host=localhost"; /* or "mysql:host=localhost;dname=bdd_shop" , they are the same setting*/
$user = "root";
$pass = "";
$attribute = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC); /*we set a PDO attribute here*/
try {
    $db = new PDO($dsn, $user, $pass, $attribute);

} catch (PDOException $e) {

    echo "" . $e->getMessage();

}


?>