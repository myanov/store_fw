<?php


namespace ishop;


class Registry
{
    use TSingleton;

    private function __construct()
    {
    }

    protected static $properties;

    public function setProperty($key, $value)
    {
        self::$properties[$key] = $value;
    }

    public function getProperty($key)
    {
        if(isset(self::$properties[$key])) {
            return self::$properties[$key];
        }
        return null;
    }

    public function getProperties()
    {
        return self::$properties;
    }
}