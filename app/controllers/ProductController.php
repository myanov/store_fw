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
        //хлебные крошки

        //связанные товары
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON related_product.related_id = product.id WHERE related_product.product_id = ?", [$product->id]);

        //запись в куки запрошенного товара

        //просмотренные товары

        //галлерея

        //модификации

        $this->setMeta($product['title'], $product['description'], $product['keywords']);
        $this->setData(compact('product', 'related'));
    }
}