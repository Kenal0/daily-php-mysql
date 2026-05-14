<?php

namespace Core;
class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function name($name, $min = 2, $max = 35)
    {
        $name = trim($name);

        if (strlen($name) < $min || strlen($name) > $max)
            return false;

        return (bool) preg_match('/^[a-zA-Zа-яА-ЯёЁ\s]+$/u', $name);
    }
}
