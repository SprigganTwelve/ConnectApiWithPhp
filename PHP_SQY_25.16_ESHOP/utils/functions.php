<?php

function checkExist($field, $param, $pdo)
{
    $sql = "SELECT * FROM users WHERE  name = ? OR $field = ?";
    $result = $pdo->prepare($sql);
    $result->execute([$param]);
    return ($result->rowCount() > 0) ? true : false;
}