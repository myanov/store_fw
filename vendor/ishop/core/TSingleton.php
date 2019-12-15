<?php


namespace ishop;


trait TSingleton
{
    protected static $instance;

    public static function instance()
    {
        if(self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}