<?php

require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

spl_autoload_register(function($className) {
    require_once 'libs/' . $className . '.php';
});

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
    die;
}