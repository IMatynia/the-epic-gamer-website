<?php
function snug_image($src, $additional_classes = [], $contents = "")
{
    $out = "";
    $out .= "<div class='snug_fit_image " . join(" ", $additional_classes) . "' style=\"background-image: url('" . $src . "');\">";
    $out .= $contents;
    $out .= "</div>";
    return $out;
}
