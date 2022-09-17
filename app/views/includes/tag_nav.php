<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/navigation.css">
</head>

<?php
if (!isset($data["nav_tags"])) {
    throw new Exception("Missing tags for tag navigation bar");
}
if (!isset($data["url_destination"]))
{
    throw new Exception("Missing url destination");
}
$tags = $data["nav_tags"];
$url_destination = $data["url_destination"];
?>

<div class="tag_nav_container">
    <?php
    foreach ($tags as $tag => $description) {
        $link = URLROOT . $url_destination . $tag;
        echo "<a class=\"cool_hover\" href=\"" . $link . "\"><div>" . strtoupper($tag) . "</div></a>";
    }
    ?>
</div>