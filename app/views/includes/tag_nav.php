<?php

class TagNavView extends View
{
    public string $url_destination;
    public array $nav_tags;

    public function __construct(string $url_destination, array $nav_tags)
    {
        $this->url_destination = $url_destination;
        $this->nav_tags = $nav_tags;
    }

    public function render(): void
    {
        ?>
        <head>
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/navigation.css">
        </head>

        <div class="tag_nav_container">
            <?php
            foreach ($this->nav_tags as $i => $tag) {
                $link = URLROOT . $this->url_destination . $tag->name;
                echo "<a class=\"cool_hover\" href=\"" . $link . "\" title='" . $tag->description . "'><div>" . strtoupper($tag->name) . " [" . $tag->n . "]</div></a>";
            }
            ?>
        </div>
        <?php
    }
}