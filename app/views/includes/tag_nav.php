<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/navigation.css">
</head>

<?php
if (!isset($data["nav_tags"])) {
    throw new Exception("Missing tags for tag navigation bar");
}
$tags = $data["nav_tags"];
?>

<div class="tag_nav_container">
    <?php
    foreach ($tags as $tag => $description) {
        $link = URLROOT . "news/browse/" . $tag;
        echo "<a class=\"cool_hover\" href=\"" . $link . "\"><div>" . strtoupper($tag) . "</div></a>";
    }
    ?>
</div>