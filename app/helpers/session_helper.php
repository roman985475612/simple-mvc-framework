<?php

session_start();

function flash($status, $msg)
{
    if (!empty($status) && !empty($msg)) {
        $_SESSION['flash'][$status] = $msg;
    } 
}