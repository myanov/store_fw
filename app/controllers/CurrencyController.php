<?php


namespace app\controllers;


use ishop\App;

class CurrencyController extends AppController
{
    public function changeAction()
    {
        if(isset($_GET['curr'])) {
            $currencies = App::$app->getProperty('currencies');
            $currency = $currencies[$_GET['curr']];
            if(isset($currency)) {
                $currency_code = $_GET['curr'];
                setcookie('currency', $currency_code, time() + 3600*24*7, '/');
            }
        }
        redirect();
    }
}