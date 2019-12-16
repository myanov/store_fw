<?php


namespace app\controllers;


class MainController extends AppController
{

    public function indexAction()
    {
//        echo __METHOD__;
        $this->setMeta('Main page', 'desc...', 'keywords...');
        $this->setData(['name' => 'Ivan', 'age' => 30]);
    }

    public function editPageAction()
    {
        echo __METHOD__;
    }
}