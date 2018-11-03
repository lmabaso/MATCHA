<?php

class Controller
{
    public function model($model)
    {
        require_once '../application/model/' . $model . '.class.php';
        return (new $model());
    }

    public function view($view, $data = [])
    {
        require_once '../application/view/' . $view . '.php';
    }
}