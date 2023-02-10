<?php
function snug_image(?string $src, array $additional_classes = [], string $contents = "")
{
    $src = ($src ?: DEFAULT_SITE_IMAGE);
    $out = "";
    $out .= "<div class='snug_fit_image " . join(" ", $additional_classes) . "' style=\"background-image: url('" . $src . "');\">";
    $out .= $contents;
    $out .= "</div>";
    return $out;
}
