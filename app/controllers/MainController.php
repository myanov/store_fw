<?php


namespace app\controllers;


use ishop\Cache;
use ishop\Registry;

class MainController extends AppController
{

    public function indexAction()
    {
//        echo __METHOD__;
        $brands = \R::find('brand', 'LIMIT 3');
        $hits = \R::find('product', "status='1' AND hit='1' LIMIT 8");
        $this->setMeta('Main page', 'desc...', 'keywords...');
        $this->setData(compact('brands', 'hits'));
    }

    public function editPageAction()
    {
        echo __METHOD__;
    }
}