<?php


namespace app\core;


class Registry
{
    private static $_storage = array();

    public static function set($key, $value)
    {
        return self::$_storage[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return (isset(self::$_storage[$key])) ? self::$_storage[$key] : $default;
    }

    public static function remove($key)
    {
        unset(self::$_storage[$key]);
        return true;
    }

    public static function clean()
    {
        self::$_storage = array();
        return true;
    }
}