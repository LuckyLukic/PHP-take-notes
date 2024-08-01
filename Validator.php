<?php

class Validator
{

    public static function string($value, $min = 1, $max = INF)  //possiamo definirla satic perche' non dipende da variabili esterne e non si riferisce a nienta ltro ache a se stessa
    {

        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}