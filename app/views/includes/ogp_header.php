<?php
if (!isset($data["ogp_data"])) {
    throw new Exception("Missing OGP data object");
}
$ogp_data = $data["ogp_data"];
?>

<head>
    <meta property="og:title" content="<?php echo $ogp_data->title; ?>" />
    <meta property="og:type" content="<?php echo $ogp_data->type; ?>" />
    <meta property="og:image" content="<?php echo $ogp_data->image; ?>" />
    <meta property="og:url" content="<?php echo $ogp_data->url; ?>" />
    <meta property="og:description" content="<?php echo $ogp_data->description; ?>" />
    <meta property="og:site_name" content="<?php echo $ogp_data->site_name ?>" />
</head>