<?php

class Validator
{
    public static function string($value) {
        return strlen($value) == 0;
    }

    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
?>