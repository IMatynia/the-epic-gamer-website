<?php

function kayval_to_list($keyval)
{
    $out = [];
    foreach ($keyval as $key => $value) {
        array_push($out, [$key, $value]);
    }
    return $out;
}

function RetrieveUserIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $address = $_SERVER['REMOTE_ADDR'];
    }
    return $address;
}