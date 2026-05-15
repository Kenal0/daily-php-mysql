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

        $length = mb_strlen($name);
        if ($length < $min || $length > $max)
            return false;

        return (bool) preg_match('/^[a-zA-Zа-яА-ЯёЁ\s]+$/u', $name);
    }
    public static function file($file, $maxSize = 2097152, $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/avif'])
    {
        if ($file['error'] === UPLOAD_ERR_NO_FILE)
        return true;

        if ($file['error'] !== UPLOAD_ERR_OK)
            return false;

        if ($file['size'] > $maxSize)
            return false;

        $realType = mime_content_type($file['tmp_name']);

        if (!in_array($realType, $allowedTypes))
            return false;

        return true;
    }
}
