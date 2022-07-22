<?php

function kayval_to_list($keyval)
{
    $out = [];
    foreach ($keyval as $key => $value) {
        array_push($out, [$key, $value]);
    }
    return $out;
}