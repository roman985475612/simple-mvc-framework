<?php

session_start();

function flash($status, $msg)
{
    if (!empty($status) && !empty($msg)) {
        $_SESSION['flash'][$status] = $msg;
    }
}

function isAuthenticated()
{
    return isset($_SESSION['user_id']);
}
