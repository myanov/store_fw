<?php


namespace app\controllers;


class MainController extends AppController
{

    public function indexAction()
    {
//        echo __METHOD__;
        $posts = \R::findAll('test');
        $this->setMeta('Main page', 'desc...', 'keywords...');
        $this->setData(['name' => 'Ivan', 'age' => 30, 'posts' => $posts]);
    }

    public function editPageAction()
    {
        echo __METHOD__;
    }
}