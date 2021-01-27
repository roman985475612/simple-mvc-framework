<?php

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function view($view, $data = [])
    {
        $filepath = '../app/views/' . $view . '.php';
        if (file_exists($filepath)) {
            require_once $filepath;
        } else {
            die('View does not exist!');
        }
    }
}