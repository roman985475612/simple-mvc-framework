<?php

function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}

function excerpt(string $str, $cnt = 150)
{
    if (empty($str)) {
        return '';
    }
    
    $excerpt = mb_substr($str, 0, mb_strrpos($str, ' ', -(mb_strlen($str) - $cnt)));
    if (strlen($str) > 150) {
        $excerpt .= ' . . .';
    }
    return $excerpt;
}