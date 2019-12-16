<?php


namespace ishop\base;


class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if(is_array($data)) extract($data);
        $view = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if(is_file($view)) {
            ob_start();
            require_once $view;
            $content = ob_get_clean();
        } else {
            throw new \Exception("Такого вида не существует", 500);
        }
        if(false !== $this->layout) {
            $layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($layout)) {
                require_once $layout;
            } else {
                throw new \Exception("Такого шаблона не существует", 500);
            }
        }
    }

    public function getMeta()
    {
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['description'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        return $output;
    }
}