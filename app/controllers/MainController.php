<?php


namespace app\controllers;


use ishop\Cache;

class MainController extends AppController
{

    public function indexAction()
    {
//        echo __METHOD__;
        $posts = \R::findAll('test');
        $test_arr = ['Ivan', 'Petr'];
        $cache = Cache::instance();
        $data = $cache->get('test');
        if(!$data) {
            $cache->set('test', $test_arr);
            $data = $cache->get('test');
        }
        $this->setMeta('Main page', 'desc...', 'keywords...');
        $this->setData(['name' => 'Ivan', 'age' => 30, 'posts' => $posts]);
    }

    public function editPageAction()
    {
        echo __METHOD__;
    }
}