<?php


namespace ishop;


class Model
{
    public $attributes;
    public $errors;
    public $rules;

    public function __construct()
    {
        DB::instance();
    }
}