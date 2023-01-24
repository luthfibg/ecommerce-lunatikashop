<?php

function currency_formatter($value)
{
    $result = number_format($value, 0, '.', ',');
    return $result;
}

?>