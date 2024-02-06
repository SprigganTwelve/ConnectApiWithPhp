<?php

function checkExist($field, $param, $pdo)
{
    $sql = "SELECT * FROM users WHERE  $field = ?";
    $result = $pdo->prepare($sql);
    $result->execute([$param]);
    return ($result->rowCount() > 0) ? true : false;
}

function dd($param)
{
    echo '<pre>';
    var_dump($param);
    echo "</pre>";
    die();
}