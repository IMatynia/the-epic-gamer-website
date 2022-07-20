<?php

/**
 * $ogp_data[]
 * "title" and "description" are necessary
 * "type" -> defaults to website
 * "image" -> defaults to website default
 * "url" -> defaults to website default
 */

if (!isset($ogp_data["type"])) {
    $ogp_data["type"] = "website";
}

if (!isset($ogp_data["image"])) {
    $ogp_data["image"] = DEFAULT_SITE_IMAGE;
}

if (!isset($ogp_data["url"])) {
    $ogp_data["url"] = URLROOT;
}
?>

<head>
    <meta property="og:title" content="<?php echo $ogp_data["title"]; ?>" />
    <meta property="og:type" content="<?php echo $ogp_data["type"]; ?>" />
    <meta property="og:image" content="<?php echo $ogp_data["image"]; ?>" />
    <meta property="og:url" content="<?php echo $ogp_data["url"]; ?>" />
    <meta property="og:description" content="<?php echo $ogp_data["description"]; ?>" />
    <meta property="og:site_name" content="<?php echo SITENAME ?>" />
</head>