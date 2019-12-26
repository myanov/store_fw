<?php


namespace app\controllers;


class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = \R::findOne("product", 'alias=?', [$alias]);
        if(!$product) {
            throw new \Exception('Product not found', 404);
        }
        $this->setMeta($product['title'], $product['description'], $product['keywords']);
        $this->setData(compact('product'));

        //хлебные крошки

        //связанные товары
        

        //запись в куки запрошенного товара

        //просмотренные товары

        //галлерея

        //модификации
    }
}