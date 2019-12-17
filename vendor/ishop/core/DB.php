<?php


namespace ishop;

class DB
{
    use TSingleton;
    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['username'], $db['password']);
        if(!\R::testConnection()) {
            throw new \Exception("Нет соединения с бд");
        }
        \R::freeze(true);
        if(DEBUG) {
            \R::debug(true, 1);
        }
    }
}