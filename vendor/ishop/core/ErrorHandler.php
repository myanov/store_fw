<?php


namespace ishop;


class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayErrors('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("Ошибка: " . date('d-m-Y H:i:s') . " | $message | в фале $file | на строке $line", 3, ROOT . '/tmp/error_log.txt');
    }

    protected function displayErrors($errnum, $errmes, $errfile, $errline, $response = 404)
    {
        http_response_code($response);
        if($response == 404 && !DEBUG) {
            require_once WWW .'/errors/404.php';
            die;
        }
        if(DEBUG) {
            require_once WWW . '/errors/dev.php';
        } else {
            require_once WWW . '/errors/prod.php';
        }
    }
}